// エントリで SCSS を import するだけで Vite がコンパイルしてくれる
import './styles/base.css';
import './styles/main.scss';

//.header-buttonクリックでナビ開閉
const headerButton = document.querySelector('.header-button');
const headerNav = document.querySelector('nav');

headerButton.addEventListener('click', () => {
  headerButton.classList.toggle('active');
  headerNav.classList.toggle('open');
  //.drawerに.drawer-activeを付与
  const drawer = document.querySelector('.drawer');
  drawer.classList.toggle('drawer-active');
});

// タブ切り替え（single-recruit）
document.querySelectorAll('.main-tab-btn a').forEach((btn, index) => {
  btn.addEventListener('click', () => {
    // ボタンの active を切り替え
    document.querySelectorAll('.main-tab-btn a').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    // コンテンツの active を切り替え
    document.querySelectorAll('.main-tab-content > div').forEach(panel => panel.classList.remove('active'));
    document.querySelectorAll('.main-tab-content > div')[index]?.classList.add('active');
  });
});
