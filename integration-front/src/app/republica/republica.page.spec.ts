import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { RepublicaPage } from './republica.page';

describe('RepublicaPage', () => {
  let component: RepublicaPage;
  let fixture: ComponentFixture<RepublicaPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ RepublicaPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(RepublicaPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
