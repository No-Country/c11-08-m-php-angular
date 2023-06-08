import { City } from "./city";
import { Subjects } from "./subjects";

export interface Teacher {
  id: number;
  user_id: number;
  photo: string;
  name: string;
  city_name: string;
  province_name: string;
  title: string;
  subjects: Subjects[];
  about_me: string;
  about_class: string;
  job_title: string;
  years_experience: number;
  price_one_class: string;
  price_two_classes: string;
  price_four_classes: string;
  certificate_file: null | string;
  average: number;
  sample_class: number;
  deleted_at: null | string;
  schedules: string[];
  total_students: number;
  total_reviews: number;
}


