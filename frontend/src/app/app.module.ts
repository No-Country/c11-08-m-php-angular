
import { NgModule } from '@angular/core';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { BrowserModule } from '@angular/platform-browser';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NgxPaginationModule } from 'ngx-pagination';  //pagi

import { HomePageComponent } from './pages/home-page/home-page.component';
import { NavbarComponent } from './components/navbar/navbar.component';
import { CardsComponent } from './components/cards/cards.component';
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';
import { SrcPageComponent } from './pages/src-page/src-page.component';
import { FooterComponent } from './components/footer/footer.component';
import { AnimationsComponent } from './components/animations/animations.component';
import { LoginRegisterComponent } from './components/login-register/login-register.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { ScheduleComponent } from './pages/schedule/schedule.component';
import { PerfilProfeComponent } from './pages/perfil-profe/perfil-profe.component';


import { CommonModule } from '@angular/common';
import { RegisterComponent } from './components/register/register.component';
import { SubscriptionComponent } from './pages/subscription/subscription.component';
import { CheckoutComponent } from './pages/payment/checkout/checkout.component';
import { ConfirmDataComponent } from './pages/payment/confirm-data/confirm-data.component';
import { FinishProfileComponent } from './pages/payment/finish-profile/finish-profile.component';
import { PaymentComponent } from './pages/payment/payment/payment.component';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { HttpClient, HttpClientModule } from '@angular/common/http';


@NgModule({
  declarations: [
    AppComponent,
    HomePageComponent,
    NavbarComponent,
    CardsComponent,
    FooterComponent,
    AnimationsComponent,
    SrcPageComponent,
    PerfilProfeComponent,
    LoginRegisterComponent,
    ScheduleComponent,
    PerfilProfeComponent

  ],
  imports: [
    HttpClientModule,
    CommonModule,
    FormsModule,
    BrowserModule,
    AppRoutingModule,
    FontAwesomeModule,
    BrowserAnimationsModule,
    FormsModule,
    NgxPaginationModule,
    ReactiveFormsModule,
    NgbModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
