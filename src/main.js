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
