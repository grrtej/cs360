from django.shortcuts import render
from .models import Job, Skill, Course, Bookmark
from django.db.models import Q
from django.contrib.auth.decorators import login_required
from django.http import HttpResponseRedirect


def create_context(request, selected_jobs):
    bookmarks = []
    jobs_with_skills = {}
    skills_with_courses = {}
    jobs = selected_jobs
    for job in jobs:
        skills = Skill.objects.filter(related_jobs=job)
        jobs_with_skills[job] = skills

        if request.user.is_authenticated and Bookmark.objects.filter(
            Q(job=job) & Q(related_users=request.user)
        ):
            bookmarks.append(job)

        for skill in skills:
            courses = Course.objects.filter(related_skills=skill)
            skills_with_courses[skill] = courses

    return {
        "jobs_with_skills": jobs_with_skills,
        "skills_with_courses": skills_with_courses,
        "bookmarks": bookmarks,
        "query": request.GET.dict(),
    }


def index(request):
    p = request.GET.get("position", "")
    l = request.GET.get("location", "")

    selected_jobs = Job.objects.filter(
        (
            Q(position__icontains=p)
            | Q(description__icontains=p)
        )
        & (Q(city__icontains=l) | Q(state__icontains=l) | Q(is_remote=(l == "remote")))
    )

    return render(request, "app/index.html", create_context(request, selected_jobs))


@login_required
def bookmarks(request):
    p = request.GET.get("position", "")
    l = request.GET.get("location", "")

    selected_jobs = Job.objects.filter(
        (
            Q(position__icontains=p)
            | Q(description__icontains=p)
        )
        & (Q(city__icontains=l) | Q(state__icontains=l) | Q(is_remote=(l == "remote")))
    )

    return render(request, "app/bookmarks.html", create_context(request, selected_jobs))


def delete_bookmark(request, job_id):
    bmark = Bookmark.objects.filter(
        Q(job=Job.objects.get(pk=job_id)) & Q(related_users=request.user)
    )[0]
    bmark.related_users.remove(request.user)

    return HttpResponseRedirect(request.META.get("HTTP_REFERER", "/"))


def add_bookmark(request, job_id):
    try:
        bmark = Bookmark.objects.filter(job=Job.objects.get(pk=job_id))[0]
    except IndexError:
        bmark = Bookmark.objects.create(job=Job.objects.get(pk=job_id))

    bmark.related_users.add(request.user)

    return HttpResponseRedirect(request.META.get("HTTP_REFERER", "/"))
