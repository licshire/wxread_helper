from django.shortcuts import render

# Create your views here.
from django.shortcuts import render, render_to_response
from django.template import RequestContext
from django.contrib.auth import login, authenticate, logout
from django.contrib.auth.models import User
from django.http import HttpResponseRedirect,HttpResponse
from django.core.urlresolvers import reverse
from django.contrib import messages
from django.core.files.storage import FileSystemStorage
from django.db.models import Q
import datetime


def index(request):
    now = datetime.datetime.now()
    data = {}
    data['current_date'] = now
    return render_to_response('index.html', data, context_instance=RequestContext(request))
