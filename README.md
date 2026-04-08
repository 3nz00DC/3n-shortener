# 🚀 3n Shortener - Sistema de Gerenciamento de Links

Um encurtador de URLs robusto e seguro, desenvolvido para integrar o ecossistema da **3n Host** e **VibeMC**. 

## 🛠️ Tecnologias Utilizadas
- **Linguagem:** PHP 8.x
- **Banco de Dados:** MySQL (PDO)
- **Servidor:** Apache (.htaccess para URLs amigáveis)
- **Frontend:** CSS3 moderno (Dark Theme)

## 📸 Screenshots & Código

### Dashboard Principal
Aqui é onde a mágica acontece. O sistema gera códigos únicos para cada link.
![Dashboard Preview](https://github.com/3nz00DC/3n-shortener/blob/codespace-verbose-space-carnival-g4rgxgwx4vpwcv7r4/dasboard.png?raw=true)

### Lógica de Redirecionamento (Backend)
Desenvolvido com foco em performance e segurança contra SQL Injection.
![Code Logic](https://github.com/3nz00DC/3n-shortener/blob/codespace-verbose-space-carnival-g4rgxgwx4vpwcv7r4/r.png?raw=true))

## 🔒 Segurança
O sistema conta com um painel administrativo protegido por sessões e as senhas são criptografadas usando `password_hash` do PHP.

## 🚀 Como rodar
1. Importe o arquivo `sql/database.sql` no seu banco.
2. Configure as credenciais em `core/config.php`.
3. Certifique-se de que o `mod_rewrite` do Apache está ativo.

---
Desenvolvido por **3n** | [Visite a 3n Shortner](https://redirecionar.3nhost.com)
