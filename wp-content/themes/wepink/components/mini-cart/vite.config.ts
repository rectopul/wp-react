import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react'
import path from 'path'


// https://vitejs.dev/config/
export default defineConfig({
  server: {
    port: 3000,
    cors: true,
    https: {
      key: path.resolve(__dirname, './localhost-key.pem'),
      cert: path.resolve(__dirname, './localhost.pem')
    }
  },
  build: {
    // generate manifest.json in outDir
    manifest: true,
    outDir: 'dist',
    rollupOptions: {
      output: {
        // Defina o nome do arquivo gerado
        assetFileNames: 'mini-cart.[hash][extname]',
      },
    },
  },
  plugins: [react()],
})