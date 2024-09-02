<p>Yth. {{ $user->name }},</p>
<br>
<p>Kami menerima permintaan untuk mereset kata sandi akun Anda yang terkait dengan alamat email ini. Jika Anda tidak meminta pengaturan ulang ini, silakan abaikan email ini.</p>
<p>Untuk mereset kata sandi Anda, silakan klik tautan di bawah ini:</p>
<p><a href="{{ $resetUrl }}">Reset Kata Sandi</a></p>
<p>Jika Anda mengalami masalah dengan tautan tersebut, Anda dapat menyalin dan menempelkan URL berikut ke browser Anda:</p>
<p>{{ $resetUrl }}</p>
<br>
<p>Tautan ini akan kedaluwarsa dalam 60 menit. Jika Anda memerlukan bantuan lebih lanjut, silakan hubungi tim dukungan kami.</p>
<hr>
<p>Terima kasih,</p>
<p>Tim PT Meksiko</p>
