import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { ToastController} from '@ionic/angular';

@Component({
  selector: 'app-cadastro',
  templateUrl: './cadastro.page.html',
  styleUrls: ['./cadastro.page.scss'],
})
export class CadastroPage implements OnInit {

  registerForm: FormGroup;

  constructor(public formbuilder: FormBuilder, public toastController: ToastController) { 
    this.registerForm = this.formbuilder.group({
      username: [null, [Validators.required, Validators.maxLength(50), Validators.minLength(4)]],
      email: [null, [Validators.email, Validators.required]],
      educationalInstitution: [null, [Validators.required]],
      password: [null, [Validators.required, Validators.minLength(6), Validators.maxLength(32)]],
    });
  }

  async presentToast() {
    const toast = await this.toastController.create({
      message: 'Perfil criado com sucesso!',
      duration: 2000
    });
    toast.present();
  }

  submitForm(form) {
    console.log(form);
    console.log(form.value);
    localStorage.setItem('username',form.value.username)
  }

  ngOnInit() {
  }

}
