import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HomePageComponent } from './pages/home-page/home-page.component';
import { PerfilProfeComponent } from './pages/perfil-profe/perfil-profe.component';
import { SrcPageComponent } from './pages/src-page/src-page.component';

const routes: Routes = [
  {
    path: '',
    redirectTo: 'home' , // if loading is add, change this "home" for loading path

    pathMatch: 'full'
  },
  {
    path: 'home',
    component: HomePageComponent,
  },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
