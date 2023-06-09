<x-app-layout>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <section class="text-gray-600 body-font overflow-hidden ">
        <div class="container px-5 mx-auto mt-8">
          <div class="lg:w-full mx-auto flex flex-wrap">
            <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="{{ asset('storage/images/'.$project->image) }}">
            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
              <h2 class="text-sm title-font text-gray-500 tracking-widest">EVENT TITLE</h2>
              <h1 class="text-gray-900 text-3xl title-font font-medium mb-1 mt-2">{{ $project->title }}</h1>
              <div class="flex mb-4">
                {{-- <span class="flex items-center">
                  <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-purple-500" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                  </svg>
                  <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-purple-500" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                  </svg>
                  <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-purple-500" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                  </svg>
                  <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-purple-500" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                  </svg>
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-purple-500" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                  </svg>
                  <span class="text-gray-600 ml-3">4 Reviews</span>
                </span> --}}

                {{-- <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200 space-x-2s">
                  <a class="text-gray-500">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                      <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                    </svg>
                  </a>
                  <a class="text-gray-500">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                      <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                    </svg>
                  </a>
                  <a class="text-gray-500">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                      <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                    </svg>
                  </a> 
                </span> --}}

                <span class="flex ml-3 pl-3 py-2 border-gray-200 space-x-2s">
                  <div class="favorite flex mt-3">
                    @if($project->favoritedBy(Auth::user())->exists())
                    <a href="/favorite/toggle/{{ $project->id }}"><i class="fas fa-heart"></i></a>
                    @else
                    <a href="/favorite/toggle/{{ $project->id }}"><i class="far fa-heart"></i></a> 
                    @endif
                    <p id="favorites_count" class="ml-1">
                      {{ $project->favorites->count() }}
                    </p>
                  </div>

                  @if($project->user_id == Auth::user()->id)
                  <a href="{{ route('user.edit-project', $project->id) }}" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 ml-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Edit</a>
                  <form action="{{ route('user.destroy-project', ['id' => $project->id]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 ml-2 focus:outline-none hover:bg-indigo-600 rounded text-lg">Delete</button>
                  </form>
                  @endif
                </span>
                  
                
              </div>
              <h2 class="text-sm title-font text-gray-500 tracking-widest">CONTENTS : </h2>
              <p class="leading-relaxed mt-2">{{ $project->contents }}</p>
              <div class="mt-4">
                <span class="title-font font-medium text-2xl text-gray-500">Location : {{ $project->location }}</span>
              </div>
              <div>
                <span class="title-font font-medium text-2xl text-gray-500">Date : {{ $project->start_time }}〜{{ $project->end_time }}</span>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <section class="text-gray-600 body-font">
      <div class="container p-5 mx-auto flex flex-wrap">
        <div class="flex flex-wrap -m-4">
          <div class="p-4 lg:w-1/2 md:w-full">
            <div class="flex rounded-lg border-gray-200 border-opacity-50 p-8 sm:flex-row flex-col">
              <div class="flex-grow">
                <div class="flex flex-row items-center justify-center">
                  <a href="{{ route('user.show', ['id' => $project->user_id]) }}"><div class="w-16 h-16 sm:mr-8 sm:mb-0 mb-4 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 flex-shrink-0">
                    <img alt="profile-image" class="w-full h-full object-cover object-center rounded-full" src="{{ asset('storage/images/'.$project->user->avatar) }}">
                  </div></a>
                  <h2 class="mr-4 text-gray-900 text-lg title-font font-medium">{{ $project->user->name }}</h2>
                  <div class="flex">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 mt-3 text-indigo-500" viewBox="0 0 24 24">
                      <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                    </svg>
                    @if($project->user->scored_count !== 0)
                    <span class="mt-2 text-gray-600 ml-1">{{ round($project->user->scores / $project->user->scored_count, 1) }} / 5</span>
                    @else
                    <span class="mt-2 text-gray-600 ml-1">0</span>
                    @endif
                    <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200 space-x-2s">
                      <a class="text-gray-500">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                          <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                        </svg>
                      </a>
                      <a class="text-gray-500">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                          <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                        </svg>
                      </a>
                      <a class="text-gray-500">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                          <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                        </svg>
                      </a> 
                    </span>
                  </div>
                </div>
                <div class="ml-5 mt-3">
                  <p>introduction</p>
                  <p class="leading-relaxed">{{ $project->user->introduction }}</p>
                </div>

                {{-- <div>
                  <a href="{{ route('user.show', ['id' => $project->user_id]) }}" class="mt-3 mb-3 text-indigo-500 inline-flex items-center">Read More</a>
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                  </svg>
                </div> --}}

              {{-- <div>
                <span class="inline-flex">
                  <a class="text-gray-500">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                      <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                    </svg>
                  </a>
                  <a class="ml-2 text-gray-500">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                      <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                    </svg>
                  </a>
                  <a class="ml-2 text-gray-500">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                      <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                    </svg>
                  </a>
                </span>
              </div> --}}

              </div>
            </div>
          </div>

          <div class="p-4 lg:w-1/2 md:w-full">
            <form method="POST" action="{{ route('user.contact_confirm', ['project_id' => $project->id]) }}">
              @csrf
            <div class="rounded-lg border-gray-200 border-opacity-50  sm:flex-row flex-col">
              <section class="text-gray-600 body-font relative w-full">
                <div class="container p-8 mx-auto">
                  <div class="flex flex-col text-center w-full ">
                    <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Contact Us</h2>
                  </div>
                  <div class="lg:w-full md:w- mx-auto">
                    <div class="flex flex-wrap -m-2">
                      <div class="p-2 w-1/2">
                        <div class="relative">
                          <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                          <input value="{{ Auth::user()->name }}" type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          @if ($errors->has('name'))
                          <p class="error-message">{{ $errors->first('name') }}</p>
                      @endif
                        </div>
                      </div>
                      <div class="p-2 w-1/2">
                        <div class="relative">
                          <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                          <input value="{{ Auth::user()->email }}" type="email" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          @if ($errors->has('email'))
                          <p class="error-message">{{ $errors->first('email') }}</p>
                      @endif
                        </div>
                      </div>
                      <div class="p-2 w-full">
                        <div class="relative">
                          <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
                          <textarea id="message" name="message" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ old('message') }}</textarea>
                        </div>
                      </div>
                      <div class="flex flex-row items-center justify-center p-2 w-full">
                        {{-- <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Jion</button> --}}
                        <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Contact</button>
                        @if ($errors->has('message'))
                        <p class="error-message">{{ $errors->first('message') }}</p>
                    @endif
                      </div>
                  </div>
                </div>
                <div class="flex">
                @if($project->id !== Auth::user()->id)
                  <div>
                  @if($joinCount < $project->max_number || $project->JoinedBy(Auth::user())->exists())
                    <div class="join mr-4">
                    @if($project->JoinedBy(Auth::user())->exists())
                      <a href="/join/toggle/{{ $project->id }}" class="mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Leave</a>
                    @else
                      <a href="/join/toggle/{{ $project->id }}" class="mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Join</a> 
                    @endif
                    </div>
                  @else
                    <p>Full</p>
                  @endif
                  </div>
                @endif
                  <p class="join-rate">{{ $joinCount }}/{{ $project->max_number }}</p>
                </div>
              </section>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </x-app-layout>
