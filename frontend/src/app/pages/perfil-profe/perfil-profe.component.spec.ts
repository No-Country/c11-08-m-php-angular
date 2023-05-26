import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PerfilProfeComponent } from './perfil-profe.component';

describe('PerfilProfeComponent', () => {
  let component: PerfilProfeComponent;
  let fixture: ComponentFixture<PerfilProfeComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [PerfilProfeComponent]
    });
    fixture = TestBed.createComponent(PerfilProfeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
