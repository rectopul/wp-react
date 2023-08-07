import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react'

// https://vitejs.dev/config/
export default defineConfig({
  publicDir: "resources",
  plugins: [react()],
  build: {
    assetsDir: "",
    emptyOutDir: true,
    manifest: true,
    outDir: `wp-content/themes/wepink/assets`,
    rollupOptions: {
      input: `resources/js/index.js`,
    },
  },
})
