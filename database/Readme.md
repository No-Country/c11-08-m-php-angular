# Clases

## Listado de Entidades

### users **(ED)**

- id **(PK)**
- role (profesor, estudiante, admin)
- email **(UQ)**
- first_name
- last_name
- password
- birthday
- identification
- address
- phone
- city_id **(FK)**
- last_connection
- deleted_at
- created_at
- updated_at

### teachers **(ED)**

- id **(PK)**
- user_id **(FK)**
- title
- description
- years_experience
- job_title
- certificate_file
- price_hour
- sample_class
- photo
- deleted_at
- created_at
- updated_at

### students **(ED)**

- id **(PK)**
- user_id **(FK)**
- description
- photo
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
- state(pendiente, confirmado, finalizado, cancelado)
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
- day (0,1,2,3,4,5,6)
- name (lunes, martes, miercoles, jueves, sabado, domingo)
- start_morning
- end_morning
- start_afternoon
- end_afternoon
- start_night
- end_night
- deleted_at
- created_at
- updated_at

### countries **(EC)**

- id **(PK)**
- name **(UQ)**
- deleted_at
- created_at
- updated_at

### cities **(EC)**

- id **(PK)**
- name **(UQ)**
- country_id **(FK)**
- deleted_at
- created_at
- updated_at

### reviews **(ED)**

- id **(PK)**
- teacher_id **(FK)**
- students_id **(FK)**
- comment
- qualification (mala, regular, buena, muy buena, excelente)
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


## Diagrama

### Modelo relacional de la Base de Datos

![Modelo relacional](Clases_ModeloE_R.png)