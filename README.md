# Multi-Stack-Apps
Misma app en diferentes tecnologias/lenguages

# Que lenguajes vamos a revisar?



## Backend

* NodeJs

* Ruby

* Python

* PHP

* Go

* C# (Net Framework o Core)

  

## Frontend

* Flutter
* Vue
* Angular
* React
* Javascript



# Que proyectos se haran?



## Fase rápida

* Generador de UUIDS, solo rest API, Igual a las opciones **por defecto** de esta pagina https://www.guidgenerator.com/online-guid-generator.aspx el unico parametro es la cantidad de UUIDS a generar

### Firma

**endpoint:** api/generate/uuid?count=n

**Response example:** 

```json
{
    "uudis": [
        "1dfdd6e1-adb5-4813-b3fe-452020f1875a", "5cbd6089-7e72-4dec-a8ba-fc7cb2b9ac17"
    ]
}
```

HttpCode: 

200 OK

404 (Si la url no cumple el api)

400(Si falta el parametro n o este no es entero positivo)



## Fase con front

### Candidatos

* TO-DO



# Artefactos

* Codigo y configuraciones necesarias subidas en el repo de github
* Publicarlo en cualquier servicio Cloud que sea gratis y por ende urls publicas para poder consumirlo
