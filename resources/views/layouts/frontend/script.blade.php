<script src="{{ asset('asset/frontend/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('asset/frontend/assets/js/popper.js') }}"></script>
<script src="{{ asset('asset/frontend/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('asset/frontend/assets/js/plugins.js') }}"></script>
<script src="{{ asset('asset/frontend/assets/js/main.js') }}"></script>
<script src="{{ asset('asset/frontend/assets/exzoom/jquery.exzoom.js') }}"></script>
@yield('js')
@livewireScripts
@stack('scripts')
