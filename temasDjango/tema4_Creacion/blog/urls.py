from django.urls import path, re_path
from . import views

urlpatterns = [
    #Ejercicio1
    path('', views.index, name='index'),
    #Ejercicio2
    path('proyectos/listar/', views.listar_proyectos, name='listar_proyectos'),
    #Ejercicio3
    path('proyecto/<int:id_proyecto>/tareas/', views.dame_tareas_proyecto, name='dame_tareas_proyecto'),
    #Ejercicio4
    path('tarea/<int:id_tarea>/usuarios/', views.dame_usuarios_tarea, name='dame_usuarios_tarea'),
    #Ejercicio5
    path('tarea/<str:texto_observacion>/', views.dame_tareas_observaciones, name='dame_tareas_observaciones'),
    #Ejercicio6
    path('tarea/<str:estado>/<int:fecha_creacion>/', views.tarea_completada, name='tarea_completada'),
    #Ejercicio7
    path('blog/<int:proyecto_id>/', views.comentario_proyecto, name='comentario_proyecto'),
    #Ejercicio8
    path('blog/<str:palabra>/<int:anio_comentario>/', views.comentario_especifico, name='comentario_especifico'),
    #Ejercicio9
    path('blog/<str:id_proyecto>/etiquetas/', views.etiqueta_proyecto, name='etiqueta_proyecto'),
]