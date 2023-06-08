
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HomePageComponent } from './pages/home-page/home-page.component';
import { SrcPageComponent } from './pages/src-page/src-page.component';
import { ScheduleComponent } from './pages/schedule/schedule.component';
import { PerfilProfeComponent } from './pages/perfil-profe/perfil-profe.component';

import { SubscriptionComponent } from './pages/subscription/subscription.component';
import { CheckoutComponent } from './pages/payment/checkout/checkout.component';
import { ConfirmDataComponent } from './pages/payment/confirm-data/confirm-data.component';
import { FinishProfileComponent } from './pages/payment/finish-profile/finish-profile.component';
import { PaymentComponent } from './pages/payment/payment/payment.component';

const routes: Routes = [
  {
    path: 'home',
    component: HomePageComponent,
  },
  {
    path: '',
    redirectTo: 'home' , // if loading is add, change this "home" for loading path
    pathMatch: 'full'
  },
  {
    path: 'src',
    component: SrcPageComponent,
  },
  {
    path: 'perfil',
    component:PerfilProfeComponent,
  },
  {
    path: 'schedule',
    component:ScheduleComponent,
  },
  {
    path: 'subscription',
    component:SubscriptionComponent,
  },
  {
    path:'payment', 
    component:PaymentComponent,
    children:[
      {path: 'checkout',
      component: CheckoutComponent,},
      { path:'confirm-data', 
      component:ConfirmDataComponent},
      { path:'finish-profile', 
      component:FinishProfileComponent},]
  }


];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
