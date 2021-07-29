@foreach ($posts as $post)
                        <div class="box mb-3 shadow-sm border rounded bg-white user-post">
                            <div class="p-3 d-flex align-items-center border-bottom user-post-header">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="img/p6.png" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold">
                                    <div class="text-truncate">{{ $post->user->first_name . ' ' . $post->user->last_name }}</div>
                                    <div class="small text-gray-500">{{ $post->user->occupation }}</div>
                                </div>
                                <span class="ml-auto small">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
                            </div>                            
                            <div class="p-3 border-bottom user-post-body">
                                <a href="#">
                                    <h6 class="font-weight-bold text-dark mb-2">{{ $post->topic }}</h6>
                                </a>
                                <p class="mb-2">{{ $post->description }}</p>
                                @if (optional($post->image)->image)
                                    <div class="img-wrapper mt-4">
                                        <img src="{{ asset('img/posts/' . optional($post->image)->image) }}"
                                            class="img-fluid" alt="Responsive image">
                                    </div>
                                @endif
                                @if (optional($post->video)->video)
                                    <hr>
                                    <div class="img-wrapper mt-4">
                                        <video width="100%" controls>
                                            <source src="{{ asset('img/posts/' . optional($post->video)->video) }}"
                                                type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                @endif
                                @if (optional($post->audio)->audio)
                                    <hr>
                                    <div class="img-wrapper mt-4">
                                        <audio width="100%" controls>
                                            <source src="{{ asset('img/posts/' . optional($post->audio)->audio) }}"
                                                type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </div>
                                @endif
                            </div>
                            {{-- <div class="p-3 border-bottom user-post-footer">
                                <a href="#" class="mr-3 text-secondary"><i class="feather-heart text-danger"></i> 16</a>
                                <a href="#" class="mr-3 text-secondary"><i class="feather-message-square"></i> 8</a>
                                <a href="#" class="mr-3 text-secondary"><i class="feather-share-2"></i> 2</a>
                            </div> --}}
                            {{-- <div class="p-3 d-flex align-items-top border-bottom user-post-comment">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="img/p7.png" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold">
                                    <div class="text-truncate"> James Spiegel <span class="float-right small">2 min</span>
                                    </div>
                                    <div class="small text-gray-500">Ratione voluptatem sequi en lod nesciunt. Neque porro
                                        quisquam est, quinder dolorem ipsum quia dolor sit amet, consectetur</div>
                                </div>
                            </div> --}}
                            {{-- <div class="p-3">
                                <textarea placeholder="Add Comment..." class="form-control border-0 p-0 shadow-none"
                                    rows="1"></textarea>
                            </div> --}}
                        </div>
                    @endforeach