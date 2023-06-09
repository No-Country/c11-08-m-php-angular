import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FinishProfileComponent } from './finish-profile.component';

describe('FinishProfileComponent', () => {
  let component: FinishProfileComponent;
  let fixture: ComponentFixture<FinishProfileComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [FinishProfileComponent]
    });
    fixture = TestBed.createComponent(FinishProfileComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
