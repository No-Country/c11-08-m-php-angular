import { ProvincesCity } from './provincesCity';

export interface City {
  id: number;
  name: string;
  province: ProvincesCity;
}
