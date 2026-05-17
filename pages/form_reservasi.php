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
            <?php for ($i = 1; $i <= 10; $i++): ?>
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

    <button type="submit" class="submit-btn btn-gold">Buat Reservasi</button>
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
        font-family: var(--font-heading);
        color: var(--text-dark);
        font-size: 1.1rem;
    }

    .reservation-form input[type="text"],
    .reservation-form input[type="email"],
    .reservation-form input[type="date"],
    .reservation-form select {
        padding: 0.8rem;
        background-color: #fff;
        border: 1px solid #ccc;
        color: var(--text-dark);
        font-family: var(--font-body);
        border-radius: 4px;
        font-size: 1rem;
    }

    .reservation-form input[type="text"]:focus,
    .reservation-form input[type="email"]:focus,
    .reservation-form input[type="date"]:focus,
    .reservation-form select:focus {
        outline: none;
        border-color: var(--gold-accent);
    }

    .radio-group {
        display: flex;
        gap: 2rem;
        margin-top: 0.5rem;
    }

    .radio-group label {
        font-family: var(--font-body);
        color: var(--text-dark);
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
    }

    .submit-btn {
        margin-top: 1rem;
        width: 100%;
    }
</style>