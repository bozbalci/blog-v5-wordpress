import globals from 'globals';
import pluginJs from '@eslint/js';

export default [
  { languageOptions: { globals: globals.browser } },
  {
    ignores: ['dist', 'vendor', 'node_modules', 'vite.config.js'],
  },
  pluginJs.configs.recommended,
];
