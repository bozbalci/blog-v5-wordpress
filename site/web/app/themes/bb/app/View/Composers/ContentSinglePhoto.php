<?php

namespace App\View\Composers;

use Exception;
use Roots\Acorn\View\Composer;

class ContentSinglePhoto extends Composer
{
    protected static $views = [
        "partials.content-single-photo"
    ];

    /**
     * @throws Exception if the image is not found
     */
    public function with(): array
    {
        $image = get_field("photo");

        if (!$image) {
            throw new Exception("Photo not found");
        }

        $imageMarkup = wp_get_attachment_image($image, "full", false, array(
            "class" => "u-photo"
        ));
        $meta = wp_get_attachment_metadata($image)["image_meta"];

        return [
            "image_markup" => $imageMarkup,
            "view_size" => "full",
            "exif_make" => $meta["make"],
            "exif_model" => $meta["camera"],
            "exif_lens" => $meta["lens"],
            "exif_iso" => $this->formatIsoSpeed($meta["iso"]),
            "exif_aperture" => $this->formatAperture($meta["aperture"]),
            "exif_shutter" => $this->formatShutterSpeed($meta["shutter_speed"]),
            "exif_focal_length" => $this->formatFocalLength($meta["focal_length"]),
            "exif_shot_at" => date("F j, Y", $meta["created_timestamp"]),
            "terms" => wp_get_post_terms(get_the_ID(), "photo-album")
        ];
    }

    private function formatIsoSpeed($iso): string
    {
        return empty($iso)
            ? "N/A"
            : "ISO $iso";
    }

    private function formatShutterSpeed($shutterSpeed): string
    {
        $str = "";
        if ((1 / $shutterSpeed) > 1) {
            $str .= "1/" . number_format(
                1 / $shutterSpeed,
                0,
                '.',
                ''
            );
        } else {
            $str .= $shutterSpeed . ' sec';
        }
        return $str;
    }

    private function formatAperture($aperture): string
    {
        return empty($aperture)
            ? "N/A"
            : "&fnof;/$aperture";
    }

    private function formatFocalLength($focalLength): string
    {
        return empty($focalLength)
            ? "N/A"
            : (round($focalLength, 0) . "mm");
    }
}
