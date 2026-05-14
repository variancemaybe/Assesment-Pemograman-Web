<form action="index.php?p=proses" method="POST" class="reservation-form">
    <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" required placeholder="Masukkan nama Anda">
    </div>

    <div class="form-group">
        <label for="email">Alamat Email</label>
        <input type="email" id="email" name="email" required placeholder="email@contoh.com">
    </div>

    <div class="form-group">
        <label for="tanggal">Tanggal Reservasi</label>
        <input type="date" id="tanggal" name="tanggal" required>
    </div>

    <div class="form-group">
        <label for="meja">Nomor Meja</label>
        <select id="meja" name="meja" required>
            <option value="">-- Pilih Meja --</option>
            <?php for($i = 1; $i <= 10; $i++): ?>
                <option value="Meja <?= $i ?>">Meja <?= $i ?></option>
            <?php endfor; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Pilihan Area</label>
        <div class="radio-group">
            <label><input type="radio" name="area" value="Non-Smoker" required> Non-Smoker</label>
            <label><input type="radio" name="area" value="Smoker" required> Smoker</label>
        </div>
    </div>

    <button type="submit" class="submit-btn">Buat Reservasi</button>
</form>

<style>
    .reservation-form {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .form-group label {
        font-family: 'Playfair Display', serif;
        color: var(--accent-color);
        font-size: 1.1rem;
    }

    .reservation-form input[type="text"],
    .reservation-form input[type="email"],
    .reservation-form input[type="date"],
    .reservation-form select {
        padding: 0.8rem;
        background-color: var(--bg-color);
        border: 1px solid var(--border-color);
        color: var(--text-color);
        font-family: 'Lora', serif;
        border-radius: 4px;
    }
    
    .reservation-form input[type="text"]:focus,
    .reservation-form input[type="email"]:focus,
    .reservation-form input[type="date"]:focus,
    .reservation-form select:focus {
        outline: none;
        border-color: var(--accent-color);
    }

    .radio-group {
        display: flex;
        gap: 2rem;
        margin-top: 0.5rem;
    }

    .radio-group label {
        font-family: 'Lora', serif;
        color: var(--text-color);
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
    }

    .submit-btn {
        margin-top: 1rem;
        padding: 1rem;
        background-color: transparent;
        border: 1px solid var(--accent-color);
        color: var(--accent-color);
        font-family: 'Playfair Display', serif;
        font-size: 1.2rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .submit-btn:hover {
        background-color: var(--accent-color);
        color: var(--bg-color);
    }
</style>
