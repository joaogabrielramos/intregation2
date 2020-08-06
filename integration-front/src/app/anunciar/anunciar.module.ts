import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { AnunciarPageRoutingModule } from './anunciar-routing.module';

import { AnunciarPage } from './anunciar.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    AnunciarPageRoutingModule,
    ReactiveFormsModule
  ],
  declarations: [AnunciarPage]
})
export class AnunciarPageModule {}
