# Clases

## Listado de Entidades

### users **(ED)**

- id **(PK)**
- role (Profesor, Estudiante, Admin)
- email **(UQ)**
- first_name
- last_name
- password
- birthdate
- identification
- phone
- photo
- city_id **(FK)**
- last_connection
- deleted_at
- created_at
- updated_at

### teachers **(ED)**

- id **(PK)**
- user_id **(FK)**
- title
- about_me
- about_class
- years_experience
- job_title
- certificate_file
- price_one_class
- price_two_classes
- price_four_classes
- sample_class
- active
- deleted_at
- created_at
- updated_at

### students **(ED)**

- id **(PK)**
- user_id **(FK)**
- description
- deleted_at
- created_at
- updated_at

### classes **(ED)**

- id **(PK)**
- teacher_id **(FK)**
- student_id **(FK)**
- subject_id **(FK)**
- sheduled_date
- start_time
- end_time
- description
- state(Pendiente, Confirmado, Finalizado, Cancelado)
- deleted_at
- created_at
- updated_at

### subjects **(EC)** 

- id **(PK)**
- name **(UQ)**
- deleted_at
- created_at
- updated_at

### teachers_subjects **(EP)** 

- id **(PK)**
- teacher_id **(FK)**
- subject_id **(FK)**
- years_experience
- level (Básico, Intermedio, Avanzado)
- certicate_file
- deleted_at
- created_at
- updated_at

### schedules **(ED)** 

- id **(PK)**
- teacher_id **(FK)**
- active
- day (1,2,3,4,5,6)
- start_morning
- end_morning
- start_afternoon
- end_afternoon
- start_night
- end_night
- deleted_at
- created_at
- updated_at

### provinces **(EC)**

- id **(PK)**
- name **(UQ)**
- deleted_at
- created_at
- updated_at

### cities **(EC)**

- id **(PK)**
- name
- province_id **(FK)**
- deleted_at
- created_at
- updated_at

### reviews **(ED)**

- id **(PK)**
- teacher_id **(FK)**
- students_id **(FK)**
- comment
- qualification (1,2,3,4,5)
- deleted_at
- created_at
- updated_at

### students_subjects **(EP)** 

- id **(PK)**
- student_id **(FK)**
- subject_id **(FK)**
- deleted_at
- created_at
- updated_at

### plans **(ED)**

- id **(PK)**
- type (3 meses, 6 meses, 1 año)
- price
- free_months
- deleted_at
- created_at
- updated_at

### payments **(ED)**

- id **(PK)**
- teacher_id **(FK)**
- plan_id **(FK)**
- fee
- total_paid
- start_date
- end_date
- deleted_at
- created_at
- updated_at

## Diagrama

### Modelo relacional de la Base de Datos

![Modelo relacional](Clases_ModeloE_R.png)