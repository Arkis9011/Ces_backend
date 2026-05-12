{!! '<' . '?xml version="1.0" encoding="UTF-8"?' . '>' !!}
<rss version="2.0"
     xmlns:content="http://purl.org/rss/1.0/modules/content/"
     xmlns:wfw="http://wellformedweb.org/CommentAPI/"
     xmlns:dc="http://purl.org/dc/elements/1.1/"
     xmlns:atom="http://www.w3.org/2005/Atom"
     xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
     xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
     xmlns:media="http://search.yahoo.com/mrss/">
    <channel>
        <title><![CDATA[{!! config('app.name', 'Conseil Économique et Social') !!} - Actualités]]></title>
        <atom:link href="{{ url('/feed') }}" rel="self" type="application/rss+xml"/>
        <link>{{ url('/') }}</link>
        <description><![CDATA[Les dernières actualités du Conseil Économique et Social]]></description>
        <lastBuildDate>{{ now()->toRfc2822String() }}</lastBuildDate>
        <language>fr</language>
        <sy:updatePeriod>hourly</sy:updatePeriod>
        <sy:updateFrequency>1</sy:updateFrequency>

        @foreach($posts as $post)
            <item>
                <title><![CDATA[{!! str_replace(']]>', ']]&gt;', strip_tags($post->titre)) !!}]]></title>
                <link>{{ route('actualites.show', $post->id) }}</link>
                <pubDate>{{ \Carbon\Carbon::parse($post->date_publication ?? $post->created_at)->toRfc2822String() }}</pubDate>
                <dc:creator><![CDATA[Service Communication CES]]></dc:creator>
                
                @if($post->categorie)
                <category><![CDATA[{!! str_replace(']]>', ']]&gt;', strip_tags($post->categorie)) !!}]]></category>
                @endif
                
                <guid isPermaLink="true">{{ route('actualites.show', $post->id) }}</guid>
                <description><![CDATA[{!! str_replace([']]>', '&nbsp;'], [']]&gt;', ' '], strip_tags($post->resume ?: \Illuminate\Support\Str::limit(strip_tags($post->contenu), 250))) !!}]]></description>
                
                <content:encoded><![CDATA[
                    @if($post->image_url)
                        <div style="margin-bottom: 20px;">
                            <img src="{{ url($post->image_url) }}" alt="{!! str_replace(['"', ']]>'], ['&quot;', ']]&gt;'], strip_tags($post->titre)) !!}" style="max-width: 100%; height: auto;"/>
                        </div>
                    @endif
                    {!! str_replace([']]>', '&nbsp;'], [']]&gt;', '&#160;'], $post->contenu) !!}
                ]]></content:encoded>

                @if($post->image_url)
                    <enclosure url="{{ url($post->image_url) }}" length="0" type="image/jpeg" />
                    <media:content url="{{ url($post->image_url) }}" medium="image" />
                    <media:thumbnail url="{{ url($post->image_url) }}" />
                @endif
            </item>
        @endforeach
    </channel>
</rss>