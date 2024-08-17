<?php

namespace App\Providers;


use App\Attributes\Action;
use App\Attributes\Filter;
use App\Hooks;
use Illuminate\Support\ServiceProvider;
use Throwable;

class ExifServiceProvider extends ServiceProvider {
    public function boot(): void {
        Hooks::apply($this);
    }

    #[Filter("wp_read_image_metadata", 10, 5)]
    public function extendImageMetadata(
        array $meta,
        string $file,
        int $imageType = null,
        array $iptc = null,
        array $exif = null
    ): array {
        /**
         * EXIF data not provided in the call, try reading it
         * from the source file.
         */
        if ($exif === false) {
            $exif = @exif_read_data($file);
            if ($exif === false) {
                return $meta;
            }
        }

        if (!empty($exif["Make"])) {
            $meta["make"] = trim($exif["Make"]);
        }

        if (!empty($exif["UndefinedTag:0xA434"])) {
            $meta["lens"] = trim($exif["UndefinedTag:0xA434"]);
        }

        return $meta;
    }

    #[Action("admin_menu")]
    public function createAdminSubmenuPage(): void {
        add_submenu_page(
            "tools.php",
            "Rescan EXIF",
            "Rescan EXIF",
            "manage_options",
            "rescan-exif",
            [$this, "getAdminSubmenuContents"]
        );
    }

    /**
     * @throws Throwable
     */
    public function getAdminSubmenuContents(): void {
        $didPost = false;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->processAllImageAttachments();
            $didPost = true;
        }

        echo view("admin/exif-submenu", ["didPost" => $didPost])->render();
    }

    public function processAllImageAttachments(): void {
        global $wpdb;

        $attachments = $wpdb->get_results("SELECT ID FROM $wpdb->posts WHERE post_type = 'attachment' AND post_mime_type LIKE 'image/%'");

        foreach ($attachments as $attachment) {
            $this->processSingleAttachment($attachment->ID);
        }
    }

    /**
     * For the given attachment, read EXIF if we can and populate
     * with additional fields. WordPress strips some of these fields
     * by default so we are basically adding them back.
     *
     * @param int $attachmentID The attachment ID.
     *
     * @return void
     */
    public function processSingleAttachment(int $attachmentID): void {
        if (!wp_attachment_is_image($attachmentID)) {
            return;
        }

        $file = get_attached_file($attachmentID);
        $meta = wp_get_attachment_metadata($attachmentID);

        if (empty($meta) || empty($meta["image_meta"])) {
            return;
        }

        $meta["image_meta"] = $this->extendImageMetadata($meta["image_meta"], $file);
        wp_update_attachment_metadata($attachmentID, $meta);
    }
}
