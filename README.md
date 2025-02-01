# CitySpace Backend API

## 🏢 Proje Hakkında

CitySpace, emlak sektörü için geliştirilmiş kapsamlı bir backend API projesidir. Bu API, konut, iş yeri ve arsa ilanlarının yönetimini sağlayan modern bir platformdur.

## 🚀 Özellikler

- 🏠 Konut ilanları yönetimi
- 🏢 İş yeri ilanları yönetimi
- 🌍 Arsa ilanları yönetimi
- 👤 Kullanıcı yönetimi ve kimlik doğrulama
- 🔍 Gelişmiş arama fonksiyonları
- 📊 Admin ve kullanıcı panoları
- ⚙️ Sistem ayarları yönetimi
- ❓ SSS (Sıkça Sorulan Sorular) yönetimi
- 🔐 JWT tabanlı kimlik doğrulama sistemi

## 🛠 Teknolojik Altyapı

- Laravel Framework
- PHP 8.x
- MySQL Veritabanı
- JWT (JSON Web Token) Authentication
- Laravel Sanctum (API Güvenliği)

## 📋 Gereksinimler

- PHP >= 8.0
- Composer
- MySQL
- Node.js & NPM

## ⚙️ Kurulum

1. Projeyi klonlayın:
```bash
git clone https://github.com/necati1054/EmlakBackend.git
```

2. Bağımlılıkları yükleyin:
```bash
composer install
npm install
```

3. .env dosyasını oluşturun:
```bash
cp .env.example .env
```

4. Uygulama anahtarını ve JWT secret key'i oluşturun:
```bash
php artisan key:generate
php artisan jwt:secret
```

5. Veritabanı ayarlarını yapın:
- .env dosyasında veritabanı bilgilerinizi düzenleyin
- Migrasyonları çalıştırın:
```bash
php artisan migrate
```

6. Uygulamayı başlatın:
```bash
php artisan serve
```

## 🔗 API Endpoint'leri

### Kimlik Doğrulama
- POST /api/login - Giriş (JWT token döner)
- POST /api/register - Kayıt
- POST /api/logout - Çıkış (JWT token invalidate edilir)
- POST /api/reset-password - Şifre sıfırlama
- POST /api/new-password/{token} - Yeni şifre belirleme

### Konut İlanları
- GET /api/konut - Tüm konutları listele
- POST /api/konut - Yeni konut ilanı ekle
- GET /api/konut/{id} - Konut detayı
- POST /api/konut/{id} - Konut güncelle
- DELETE /api/konut/{id} - Konut sil

### İş Yeri İlanları
- GET /api/isyeri - Tüm iş yerlerini listele
- POST /api/is_yeri - Yeni iş yeri ilanı ekle
- GET /api/isyeri/{id} - İş yeri detayı
- POST /api/is_yeri/{id} - İş yeri güncelle
- DELETE /api/is_yeri/{id} - İş yeri sil

### Arsa İlanları
- GET /api/arsa - Tüm arsaları listele
- POST /api/arsa - Yeni arsa ilanı ekle
- GET /api/arsa/{id} - Arsa detayı
- POST /api/arsa/{id} - Arsa güncelle
- DELETE /api/arsa/{id} - Arsa sil

### Diğer Endpoint'ler
- GET /api/admin-dashboard - Admin panosu
- GET /api/user-dashboard/{id} - Kullanıcı panosu
- GET /api/home-page - Ana sayfa verileri
- GET /api/settings - Sistem ayarları
- GET /api/faq - SSS listesi

## 🔒 Güvenlik

- JWT (JSON Web Token) tabanlı kimlik doğrulama sistemi
  - Token bazlı güvenli oturum yönetimi
  - Access token süresi yapılandırılabilir
  - Refresh token desteği
- API, Laravel Sanctum ile ek güvenlik katmanı
- Tüm hassas veriler şifrelenmektedir
- Rate limiting uygulanmıştır
- CORS politikaları yapılandırılmıştır

## 🤝 Katkıda Bulunma

1. Fork'layın
2. Feature branch oluşturun (`git checkout -b feature/amazing-feature`)
3. Commit'leyin (`git commit -m 'feat: Add amazing feature'`)
4. Push'layın (`git push origin feature/amazing-feature`)
5. Pull Request açın

## 📝 Lisans

Bu proje [MIT](LICENSE) lisansı altında lisanslanmıştır.
