import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SrcPageComponent } from './src-page.component';

describe('SrcPageComponent', () => {
  let component: SrcPageComponent;
  let fixture: ComponentFixture<SrcPageComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [SrcPageComponent]
    });
    fixture = TestBed.createComponent(SrcPageComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
