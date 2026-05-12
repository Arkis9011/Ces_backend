<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:media="http://search.yahoo.com/mrss/">
  <xsl:output method="html" encoding="UTF-8" indent="yes"/>
  
  <xsl:template match="/">
    <html>
      <head>
        <title><xsl:value-of select="rss/channel/title"/></title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Playfair+Display:ital,wght@0,700;1,700&amp;display=swap" rel="stylesheet" />
        <style>
          :root {
            --bleu: #007FFF;
            --bleu-fonce: #005BBB;
            --bleu-clair: #e8f2ff;
            --jaune: #F7D117;
            --rouge: #CE1126;
            --blanc: #FFFFFF;
            --gris-clair: #f4f6f9;
            --gris-texte: #555;
            --texte: #1a1a2e;
            --ombre: 0 4px 24px rgba(0, 0, 0, 0.10);
          }
          * { margin: 0; padding: 0; box-sizing: border-box; }
          body { font-family: 'Inter', sans-serif; background: var(--gris-clair); color: var(--texte); line-height: 1.7; }
          .container { max-width: 900px; margin: 0 auto; padding: 40px 20px; }
          .header { background: linear-gradient(135deg, var(--bleu-fonce) 0%, #003a7a 60%, #001f4d 100%); color: white; padding: 50px 40px; border-radius: 14px; margin-bottom: 30px; text-align: center; position: relative; overflow: hidden; box-shadow: var(--ombre); }
          .header::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, var(--bleu), var(--jaune), var(--rouge)); }
          .header h1 { font-family: 'Playfair Display', serif; font-size: 36px; margin-bottom: 12px; font-weight: 700; }
          .header p { font-size: 16px; opacity: 0.85; max-width: 600px; margin: 0 auto; }
          .feed-badge { display: inline-flex; align-items: center; gap: 8px; background: rgba(255, 255, 255, 0.15); border: 1px solid rgba(255, 255, 255, 0.4); padding: 6px 16px; border-radius: 20px; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; margin-top: 20px; color: var(--blanc); }
          .feed-info { background: var(--blanc); padding: 20px 30px; border-radius: 12px; margin-bottom: 30px; box-shadow: var(--ombre); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px; border: 1px solid #e5ebf4; }
          .feed-info .left { color: var(--gris-texte); font-size: 14px; }
          .feed-info .left strong { color: var(--bleu-fonce); font-size: 16px; font-weight: 700; }
          .feed-info .right { font-size: 13px; color: #888; display: flex; align-items: center; gap: 6px; }
          .item { background: var(--blanc); padding: 35px; margin-bottom: 25px; border-radius: 14px; box-shadow: var(--ombre); border: 1px solid #e5ebf4; transition: transform 0.2s ease, box-shadow 0.2s ease; }
          .item:hover { transform: translateY(-3px); box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12); }
          .item-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 18px; flex-wrap: wrap; gap: 12px; }
          .category { display: inline-flex; align-items: center; background: var(--bleu-clair); color: var(--bleu-fonce); padding: 5px 14px; border-radius: 20px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; }
          .date { color: var(--gris-texte); font-size: 13px; display: flex; align-items: center; gap: 6px; }
          .item h2 { font-family: 'Playfair Display', serif; font-size: 26px; margin-bottom: 15px; line-height: 1.3; font-weight: 700; }
          .item h2 a { color: var(--texte); text-decoration: none; transition: color 0.2s ease; }
          .item h2 a:hover { color: var(--bleu); }
          .meta { display: flex; align-items: center; gap: 20px; margin-bottom: 20px; font-size: 13px; color: var(--gris-texte); flex-wrap: wrap; }
          .meta span { display: flex; align-items: center; gap: 6px; }
          .description { color: var(--gris-texte); line-height: 1.8; font-size: 15px; }
          .description p { margin-bottom: 12px; text-align: justify; }
          .read-more { display: inline-flex; align-items: center; gap: 8px; margin-top: 20px; color: var(--bleu); font-weight: 600; font-size: 14px; text-decoration: none; transition: color 0.2s; }
          .read-more:hover { color: var(--bleu-fonce); }
          .footer { text-align: center; padding: 40px; color: var(--gris-texte); font-size: 13px; opacity: 0.8; }
          .item-image { width: 100%; max-height: 350px; object-fit: cover; border-radius: 10px; margin-bottom: 20px; }
          @media (max-width: 640px) {
            .header { padding: 40px 20px; }
            .header h1 { font-size: 28px; }
            .item { padding: 25px; }
            .item h2 { font-size: 22px; }
            .feed-info { flex-direction: column; align-items: flex-start; }
          }
        </style>
      </head>
      <body>
        <div class="container">
          <div class="header">
            <h1><xsl:value-of select="rss/channel/title"/></h1>
            <p><xsl:value-of select="rss/channel/description"/></p>
            <div class="feed-badge">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 11a9 9 0 0 1 9 9"/><path d="M4 4a16 16 0 0 1 16 16"/><circle cx="5" cy="19" r="1"/></svg>
              Flux RSS
            </div>
          </div>
          
          <div class="feed-info">
            <div class="left">
              <strong><xsl:value-of select="count(rss/channel/item)"/></strong> article(s) publié(s)
            </div>
            <div class="right">
              Dernière mise à jour : <xsl:value-of select="rss/channel/lastBuildDate"/>
            </div>
          </div>
          
          <xsl:for-each select="rss/channel/item">
            <div class="item">
              <div class="item-header">
                <xsl:if test="category">
                  <span class="category"><xsl:value-of select="category"/></span>
                </xsl:if>
                <span class="date">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                  <xsl:value-of select="pubDate"/>
                </span>
              </div>
              
              <h2>
                <a href="{link}" target="_blank">
                  <xsl:value-of select="title"/>
                </a>
              </h2>
              
              <div class="meta">
                <span>
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                  <xsl:value-of select="dc:creator"/>
                </span>
              </div>
              
              <xsl:if test="media:content">
                <img src="{media:content/@url}" class="item-image" alt="{title}" />
              </xsl:if>
              
              <div class="description">
                <xsl:value-of select="description"/>
              </div>
              
              <a href="{link}" target="_blank" class="read-more">
                Lire l'article complet
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
              </a>
            </div>
          </xsl:for-each>
          
          <div class="footer">
            Conseil Économique et Social — Flux RSS
          </div>
        </div>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>
