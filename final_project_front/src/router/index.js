import { createRouter, createWebHistory } from 'vue-router'
import BobfWrite from '../views/BobfWrite'
import BobfList from '../views/BobfList'

import LoginJoin from '../views/LoginJoin';
import PassWord from '../views/PassWord';
import KakaoLogin from '../views/KakaoLogin';
import NaverLogin from '../views/NaverLogin';

import Main from '../views/Main';
import SearchList from '../views/SearchList'
import store from '@/store';
import MyPage from '../views/MyPage';

//네비게이션 가드
const requireAuth = () => (to, from, next) => {
  if(store.state.user.iuser === undefined){
    swal.fire('로그인을 하세요.', '', 'warning');
    return;
  }
  next();
}


const routes = [
  {
    path: '/',
    name: 'Main',
    component: Main
  },
  {
    path: '/SearchList',
    name: 'SearchList',
    component: SearchList
  },
  {
    path: '/BobfList',
    name: 'BobfList',
    component: BobfList
  },
  {
    path: '/BobfWrite',
    name: 'BobfWrite',
    component: BobfWrite
  },
  {
    path: '/LoginJoin',
    name: 'LoginJoin',
    component: LoginJoin
  },
  {
    path: '/PassWord',
    name: 'PassWord',
    component: PassWord
  },
  {
    path: '/KakaoLogin',
    name: 'KakaoLogin',
    component: KakaoLogin
  },
  {
    path: '/NaverLogin',
    name:'NaverLogin',
    component:NaverLogin
  },
  {
    path:'/PassWord',
    name: 'PassWord',
    component: PassWord
  },
  {
    path:'/MyPage',
    name: 'MyPage',
    component: MyPage
  },

];


const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
});

export default router
