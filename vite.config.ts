import { fileURLToPath, URL } from 'node:url'

import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import vueDevTools from 'vite-plugin-vue-devtools'

// https://vite.dev/config/
export default defineConfig({
  plugins: [
    vue(),
    vueDevTools(),
  ],
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url))
    },
  },
  css: {
    preprocessorOptions: {
      scss: {
        additionalData: `
        @import "@/styles/_mixins.scss";
        @import "@/styles/_variables.scss";
        `,
      },
    },
  },

  server: {
    port: 3000,
    open: true,
    proxy: {
      '/api': {
        target: 'http://95.154.83.43/api',
        changeOrigin: true,
        // /api/parts/root -> http://95.154.83.43/api/parts/root
        rewrite: (path) => path.replace(/^\/api/, '')
      },
    },
  },
})
