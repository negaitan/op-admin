# Open Park


# Endpoints

- GET|HEAD | api/amenities
- GET|HEAD | api/amenities/{amenity}
- GET|HEAD | api/class_groups
- GET|HEAD | api/class_groups/{class_group}
- GET|HEAD | api/clubs
- GET|HEAD | api/clubs/{club}
- GET|HEAD | api/gym_classes  
    **Sort examples**
    - /api/gym_classes?club=21
    - /api/gym_classes?day=domingo
    - /api/gym_classes?club=21&day=domingo
    - /api/gym_classes?by_daytime
    - /api/gym_classes?club=21&day=domingo&by_daytime
- GET|HEAD | api/gym_classes/{gym_class}
- GET|HEAD | api/home **(Settings: user defined)**
- GET|HEAD | api/images
- GET|HEAD | api/images/{image}  
- GET|HEAD | api/plans
- GET|HEAD | api/plans/{plan}
- GET|HEAD | api/web-texts
