import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { ProductosagricolasComponent } from './productosagricolas/productosagricolas.component';

const routes: Routes = [
    { path: 'principal', component: ProductosagricolasComponent },
     { path: '', component: ProductosagricolasComponent },

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
