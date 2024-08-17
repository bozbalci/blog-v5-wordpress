import path from 'path';
import {defineConfig} from 'vite';
import laravel from "laravel-vite-plugin";

const SITE_ABSOLUTE_PATH = path.resolve('../../../');
const THEME_RELATIVE_PATH = __dirname.replace(SITE_ABSOLUTE_PATH, '');

const entryPoints = [
  "resources/styles/theme.scss",
  "resources/scripts/entry.js"
]

// noinspection JSUnusedGlobalSymbols
export default defineConfig({
  base: process.env.NODE_ENV === 'production' ? `${THEME_RELATIVE_PATH}/dist/` : '',
  build: {
    manifest: "manifest.json",
    assetsDir: ".",
    outDir: "dist",
    emptyOutDir: true,
    sourcemap: true,
    rollupOptions: {
      input: entryPoints,
      output: {
        entryFileNames: '[hash].js',
        assetFileNames: '[hash].[ext]',
      },
    }
  },
  server: {
    host: "localhost"
  },
  plugins: [
    // {
    //   name: 'php',
    //   handleHotUpdate({file, server}) {
    //     if (file.endsWith('.php')) {
    //       server.ws.send({type: 'full-reload'});
    //     }
    //   },
    // },
    // laravel({
    //   input: ['resources/styles/theme.scss', 'resources/scripts/entry.js'],
    //   refresh: [
    //     "resources/**"
    //   ],
    //   buildDirectory: "dist",
    //   hotFile: "dist/hot",
    // })
  ],
  resolve: {
    alias: [
      {
        find: /~(.+)/,
        replacement: process.cwd() + '/node_modules/$1',
      },
      {
        find: /@(.+)/,
        replacement: '/resources/scripts/$1'
      }
    ],
  },
  /**
   * Language settings
   */
  css: {
    preprocessorOptions: {
      scss: {
        quietDeps: true,
      },
    },
  },
});
