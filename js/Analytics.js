class Analytics
{
    // https://developers.google.com/analytics/devguides/collection/analyticsjs/events
    // example: ga('send', 'event', [eventCategory], [eventAction], [eventLabel], [eventValue], [fieldsObject]);
    
    static SendEvent(eventCategory, eventAction, eventLabel, eventValue)
    {
        console.log("event: category=" + eventCategory + ", eventAction=" + eventAction + ", eventLabel=" + eventLabel + ", eventValue=" + eventValue);
        ga('send', 'event', eventCategory, eventAction, eventLabel, eventValue);
    }

    static TrackFilterOpen()
    {
        this.SendEvent("filters", "open");
    }

    static TrackFilterApply(sortId, onAir, unconformed, confirmed)
    {
        this.SendEvent("filters", "apply", "sort_id", sortId);
        this.SendEvent("filters", "apply", "on_air", onAir ? 1 : 0);
        this.SendEvent("filters", "apply", "unconformed", unconformed ? 1 : 0);
        this.SendEvent("filters", "apply", "confirmed", confirmed ? 1 : 0);
    }

    static TrackShowEntireList()
    {
        this.SendEvent("single_mode", "navigation", "show_entire_list");
    }

    static TrackGoBack()
    {
        this.SendEvent("single_mode", "navigation", "go_back");
    }

    static TrackSearchPhrase(search_phrase)
    {
        this.SendEvent("filters", "search_phrase", search_phrase);
    }
}
