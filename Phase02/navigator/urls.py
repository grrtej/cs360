from django.urls import path
from . import views

urlpatterns = [
    path("", views.index, name="navigator-index"),
    path("instructions/", views.instructions, name="navigator-instructions"),
    path("about/", views.about, name="navigator-about"),
    path("login/", views.login, name="navigator-login"),
    path("signup/", views.signup, name="navigator-signup"),
]
