
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HomePageComponent } from './pages/home-page/home-page.component';
import { PerfilProfeComponent } from './pages/perfil-profe/perfil-profe.component';
import { SrcPageComponent } from './pages/src-page/src-page.component';
import { PerfilProfeComponent } from './pages/perfil-profe/perfil-profe.component';

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
  {
    path: 'src',
    component: SrcPageComponent,
  },
<<<<<<< HEAD
  {path :'perfil',
  component: PerfilProfeComponent,
=======
  {
    path: 'perfil-profe',
    component:PerfilProfeComponent,
>>>>>>> 255c6b9b23b6ed7b0e14d8d0b62a61b545e8e7b9
  }

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
