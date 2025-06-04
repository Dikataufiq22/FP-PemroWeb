  function sendToWA() {
        const phone = "62895622357048"; // Ganti dengan nomor WA tujuan
        const message = "Halo, saya tertarik dan ingin menghubungi Anda.";
        const url = `https://wa.me/${phone}?text=${encodeURIComponent(
          message
        )}`;
        window.open(url, "_blank");
      }