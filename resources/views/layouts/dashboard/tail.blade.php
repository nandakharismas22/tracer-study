<!-- JAVASCRIPT -->
<script src="{{asset('dashboard_assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('dashboard_assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('dashboard_assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('dashboard_assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('dashboard_assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('dashboard_assets/js/app.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
@if(Session::has('alertType'))
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    Toast.fire({
        icon: '{{ Session::get("alertType") }}',
        title: '{{ Session::get("alertMessage") }}'
    });
@endif
</script>
<script>
    function copyToClipboard() {
        const copyText = document.getElementById("kuesionerUrl");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
        
        // Show notification
        const originalText = event.target.innerHTML;
        event.target.innerHTML = '<i class="fas fa-check"></i> Tersalin!';
        setTimeout(() => {
            event.target.innerHTML = originalText;
        }, 2000);
    }
    
    function shareTo(platform) {
        const url = document.getElementById("kuesionerUrl").value;
        const text = "Isi kuesioner alumni kami: ";
        
        let shareUrl = '';
        switch(platform) {
            case 'facebook':
                shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
                break;
            case 'twitter':
                shareUrl = `https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}&url=${encodeURIComponent(url)}`;
                break;
            case 'whatsapp':
                shareUrl = `https://wa.me/?text=${encodeURIComponent(text + url)}`;
                break;
            case 'telegram':
                shareUrl = `https://t.me/share/url?url=${encodeURIComponent(url)}&text=${encodeURIComponent(text)}`;
                break;
            case 'email':
                shareUrl = `mailto:?subject=Kuesioner Alumni&body=${encodeURIComponent(text + url)}`;
                break;
        }
        
        // Open in a small popup window (optional)
        if (platform !== 'email') {
            window.open(shareUrl, 'shareWindow', 'width=600,height=400');
        } else {
            window.location.href = shareUrl;
        }
    }
</script>
@stack('scripts')
</body>

</html>
