// vite.config.mjs
import { defineConfig } from 'vite';
import path from 'path';
import FullReload from 'vite-plugin-full-reload';

//autoprefixer is included in tailwindcss/vite plugin
import autoprefixer from 'autoprefixer';

export default defineConfig(({ command }) => {
  const isDev = command === 'serve';
  const rootPath = path.resolve(__dirname, 'src');

  return {
    root: rootPath,
    base: isDev ? '/' : '/', //今回はwordpressなのでproductionもルートパス
    resolve: {
      alias: {
        // src を @ で参照できるようにする（SCSS @use に便利）
        '@': rootPath,
      },
    },

    server: {
      // 0.0.0.0 (host:true) にバインド → コンテナ/ホスト/ネットワーク越しに到達可能
      host: true,
      port: 5173,
      // ブラウザがアクセスする URL（Compose で "5173:5173" しているため localhost）
      origin: 'http://localhost:5173',
      hmr: {
        // HMR が接続する「ホスト名」はブラウザが使うホスト名（localhost が普通）
        host: 'localhost',
        protocol: 'ws',
        port: 5173,
      },
      watch: { usePolling: true, interval: 100 },
    },

    css: {
      preprocessorOptions: {
        scss: {
          // src/styles/_tokens.scss を全ての scss に先頭挿入（@use 推奨）
          //  @ alias を有効にしたので "@/styles/_tokens.scss" が使える
          //additionalData: `@use "@/styles/_tokens.scss" as *;`,
          //includePaths: [path.resolve(__dirname, 'src', 'styles')],
          //additionalData: `@import "@/styles/base.css";`,
        },
      },
    },

    build: {
      outDir: path.resolve(__dirname, 'dist'),
      emptyOutDir: true,
      manifest: true, // WordPress 側で参照する manifest.json を出す
      rollupOptions: {
        input: {
          main: path.resolve(rootPath, 'main.js'),
        },
      },
    },
    plugins: [
      autoprefixer(),
      isDev &&
        FullReload([
          // WordPress ドキュメントルートを監視
          // public/ が WP のルートならこれで OK
          path.resolve(__dirname, '*.php'),
          // テーマだけ監視したければ:
          // path.resolve(__dirname, 'public/wp-content/themes/**/**/*.php')
        ]),
    ].filter(Boolean),
  };
});
