import path from 'path';
import { defineConfig } from 'vite';
import laravel from "laravel-vite-plugin";

const siteAbsolutePath = path.resolve('../../../');
const themeRelativePath = __dirname.replace(siteAbsolutePath, '');

const entryPoints = [
  "resources/styles/theme.scss",
  "resources/scripts/entry.js"
]

// noinspection JSUnusedGlobalSymbols
export default defineConfig({
  base: process.env.NODE_ENV === 'production' ? `${themeRelativePath}/dist/` : '',
  build: {
    manifest: 'manifest.json',
    assetsDir: '.',
    outDir: `dist`,
    emptyOutDir: true,
    sourcemap: true,
    rollupOptions: {
      input: entryPoints,
      output: {
        entryFileNames: '[hash].js',
        assetFileNames: '[hash].[ext]',
      },
    },
  },
  plugins: [
    laravel({
      input: entryPoints,
      buildDirectory: "dist",
      hotFile: "dist/hot"
    }),
    {
      name: 'php',
      handleHotUpdate({ file, server }) {
        if (file.endsWith('.php')) {
          server.ws.send({ type: 'full-reload' });
        }
      },
    },
  ],
  resolve: {
    alias: [
      {
        find: /~(.+)/,
        replacement: process.cwd() + '/node_modules/$1',
      },
    ],
  },
  css: {
    preprocessorOptions: {
      scss: {
        quietDeps: true,
      },
    },
  },
});
