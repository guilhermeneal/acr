<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Encontre o seu próximo veículo.">
    <title>@yield('title', 'Estrada - veículos')</title>
    <style>
        :root{font-family:Inter,ui-sans-serif,system-ui,-apple-system,"Segoe UI",sans-serif;color:#17211d;background:#f5f6f2;font-synthesis:none}*{box-sizing:border-box}body{margin:0}a{color:inherit;text-decoration:none}.topbar{background:#10251e;color:white}.nav{max-width:1120px;margin:auto;padding:18px 24px;display:flex;align-items:center;justify-content:space-between}.brand{font-weight:800;font-size:1.2rem;letter-spacing:.04em}.nav-links{display:flex;gap:22px;color:#d9e4dc;font-size:.95rem}.container{max-width:1120px;margin:auto;padding:34px 24px 60px}.eyebrow{color:#49765c;text-transform:uppercase;letter-spacing:.13em;font-weight:700;font-size:.75rem}.hero{padding:28px 0 12px}.hero h1{font-size:clamp(2rem,5vw,3.5rem);line-height:1.05;margin:10px 0}.muted{color:#63716a}.filters{display:grid;grid-template-columns:2fr 1fr 1fr auto;gap:10px;margin:22px 0 28px}.input,.button{font:inherit;padding:12px 14px;border:1px solid #d9dfda;border-radius:8px;background:white}.button{background:#176b48;color:white;border-color:#176b48;font-weight:700;cursor:pointer}.grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:18px}.card{background:white;border:1px solid #e5e9e5;border-radius:12px;overflow:hidden}.card img{width:100%;height:190px;object-fit:cover;background:#e6ebe6}.card-body{padding:16px}.card h3{margin:5px 0 8px}.price{font-size:1.25rem;font-weight:800;color:#176b48}.badge{display:inline-block;padding:5px 9px;border-radius:999px;background:#e8f2eb;color:#176b48;font-size:.78rem;font-weight:700}.spotlight{background:#e8efe8;border-radius:14px;padding:22px;margin:20px 0 28px;display:flex;justify-content:space-between;gap:20px;align-items:center}.spotlight p{margin:6px 0}.detail{display:grid;grid-template-columns:1.2fr 1fr;gap:28px;background:white;padding:20px;border-radius:14px}.detail img{width:100%;max-height:480px;object-fit:cover;border-radius:10px;background:#e6ebe6}.footer{border-top:1px solid #e0e5e0;color:#68746d;padding:22px;text-align:center}.pagination{margin-top:24px}.empty{background:white;padding:24px;border-radius:10px}@media(max-width:760px){.grid{grid-template-columns:repeat(2,minmax(0,1fr))}.filters{grid-template-columns:1fr 1fr}.filters .search{grid-column:1/-1}.detail{grid-template-columns:1fr}.nav{padding:16px}.container{padding:26px 16px 44px}}@media(max-width:480px){.grid{grid-template-columns:1fr}.card img{height:220px}.nav-links{gap:12px;font-size:.85rem}.spotlight{align-items:flex-start;flex-direction:column}}
    </style>
</head>
<body>
    <header class="topbar"><nav class="nav"><a class="brand" href="{{ route('veiculos.index') }}">ESTRADA</a><div class="nav-links"><a href="{{ route('veiculos.index') }}">Veículos</a><a href="{{ route('categorias.index') }}">Categorias</a><a href="mailto:contacto@estrada.pt">Contactos</a></div></nav></header>
    <main class="container">@yield('content')</main>
    <footer class="footer">Estrada · Encontre o próximo caminho.</footer>
</body>
</html>
