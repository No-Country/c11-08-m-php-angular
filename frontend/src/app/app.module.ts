

import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HomePageComponent } from './pages/home-page/home-page.component';
import { NavbarComponent } from './components/navbar/navbar.component';
import { CardsComponent } from './components/cards/cards.component';
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';
import { SrcPageComponent } from './pages/src-page/src-page.component';
import { FooterComponent } from './components/footer/footer.component';
import { AnimationsComponent } from './components/animations/animations.component';
import { PerfilProfeComponent } from './pages/perfil-profe/perfil-profe.component';




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


  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FontAwesomeModule,

  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
