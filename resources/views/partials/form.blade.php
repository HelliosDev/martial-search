@csrf
    <div class="form-group">
        <div class="avatar__dojo">
            {{ Form::file('foto_tempat', ['accept' => 'image/*', 'class'=>'dropzone', 'required', 'id' => 'profile__dojo']) }}
            <img src="{{ asset('img/background/transparent.png') }}" alt="Dojo Picture" class="picture__dojo" id="picture__dojo">
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('nama_tempat', 'Nama Tempat') }}
        {{ Form::text('nama_tempat', null, ['id' => 'nama_tempat', 'required']) }}
    </div>
    <div class="form-group">
        {{ Form::label('est_date', 'Tanggal Berdiri') }}
        {{ Form::date('tanggal', null, ['id' => 'est_date', 'required']) }}
    </div>
    <div class="form-group">
        {{ Form::label('location', 'Lokasi') }}
        {{ Form::text('location', null, ['id' => 'location', 'required']) }}
    </div>
    <div class="form-group">
        {{ Form::label('schedule', 'Jadwal') }}
        <div class="form-row">
            <div class="form-col">
                {{ Form::select('hari_latihan',
                [
                    'Senin' => 'Senin', 
                    'Selasa' => 'Selasa',
                    'Rabu' => 'Rabu',
                    'Kamis' => 'Kamis',
                    'Jumat' => 'Jumat',
                    'Sabtu' => 'Sabtu',
                    'Minggu' => 'Minggu'
                ]) }}

            </div>
            <div class="form-col">
                {{-- <input type="time" name="jadwal_mulai" class="hour"> --}}
                {{ Form::time('jadwal_mulai', null, ['class' => 'hour', 'required']) }}
            </div>
            <div class="form-col">
                {{-- <input type="time" name="jadwal_berakhir" class="hour"> --}}
                {{ Form::time('jadwal_berakhir', null, ['class' => 'hour', 'required']) }}
            </div>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('biaya', 'Biaya') }}
        {{ Form::number('biaya', null, ['id' => 'biaya', 'required']) }}
    </div>
    <div class="form-group">
        {{ Form::label('martial_arts', 'Jenis Beladiri') }}
        {{ Form::textarea('beladiri', null, ['id' => 'martial_arts', 'cols' => 30, 'rows' => 10, 'required']) }}
    </div>
</div>
{{ Form::button('Submit', ['type' => 'submit'] ) }}