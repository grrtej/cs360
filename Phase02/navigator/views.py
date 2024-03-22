from django.shortcuts import render
from django.db.models import Q
from .models import Job


def gen_navbar(active_title):
    navbar = {
        "left": [
            {"title": "Home", "url": "navigator-index"},
            {"title": "Instructions", "url": "navigator-instructions"},
            {"title": "About", "url": "navigator-about"},
        ],
        "right": [
            {"title": "Sign in", "url": "navigator-login"},
            {"title": "Sign up", "url": "navigator-signup"},
        ],
    }

    for side in navbar:
        index = next(
            (i for i, item in enumerate(navbar[side]) if item["title"] == active_title),
            None,
        )
        if index is not None:
            navbar[side][index]["active"] = True

    return navbar


def index(request):
    p = request.GET.get("position", "")
    l = request.GET.get("location", "")

    title = "Home"
    context = {
        "title": title,
        "navbar": gen_navbar(title),
        "jobs": Job.objects.filter(
            (Q(position__icontains=p) | Q(description__icontains=p))
            & Q(location__icontains=l)
        ),
        "query": request.GET.dict(),
    }
    return render(request, "navigator/index.html", context)


def instructions(request):
    title = "Instructions"
    context = {"title": title, "navbar": gen_navbar(title)}
    return render(request, "navigator/instructions.html", context)


def about(request):
    title = "About"
    context = {"title": title, "navbar": gen_navbar(title)}
    return render(request, "navigator/about.html", context)


def login(request):
    title = "Sign in"
    context = {"title": title, "navbar": gen_navbar(title)}
    return render(request, "navigator/login.html", context)


def signup(request):
    title = "Sign up"
    context = {"title": title, "navbar": gen_navbar(title)}
    return render(request, "navigator/signup.html", context)
