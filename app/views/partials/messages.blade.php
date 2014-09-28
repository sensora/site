<div class="row errorMessage">
    @if( $errors->has() )
    <div data-alert class="alert-box alert" tabindex="0" aria-live="assertive" role="dialogalert">
        <ul>
        @foreach ( $errors->all('<li>:message</li>') as $error )
            {{ $error }}
        @endforeach
        </ul>
        <button href="#" tabindex="0" class="close" aria-label="Cerrar">&times;</button>
    </div>
    @endif

    @foreach ( array('success', 'info', 'warning', 'secondary') as $level )
        @if ( Session::has( $level ) )
        <div data-alert class="alert-box {{ $level }}" tabindex="0" aria-live="assertive" role="dialogalert">
            <ul>
                <li>{{ Session::get( $level ) }}</li>
            </ul>
            <button href="#" tabindex="0" class="close" aria-label="Cerrar">&times;</button>
        </div>
        @endif
    @endforeach
</div>