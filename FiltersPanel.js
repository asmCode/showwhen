class FiltersPanel
{
    constructor(panelRoot)
    {
      this.sortBy = 0;
      this.filterOnAir = true;
      this.filterUncon = true;
      this.filterCon = true;

      this.panelRoot = panelRoot;
      this.buttonScore = $(panelRoot).find("#filters_button_sort_score");
      this.buttonTitle = $(panelRoot).find("#filters_button_sort_title");
      this.buttonDate = $(panelRoot).find("#filters_button_sort_date");

      this.filters_option_on_air = $(panelRoot).find("#filters_option_on_air");
      this.filters_option_uncon = $(panelRoot).find("#filters_option_uncon");
      this.filters_option_con = $(panelRoot).find("#filters_option_con");

      this.chbxOnAir = $(panelRoot).find("#filters_checkbox_on_air");
      this.chbxUnconfirmed = $(panelRoot).find("#filters_checkbox_unconfirmed");
      this.chbxConfirmed = $(panelRoot).find("#filters_checkbox_confirmed");

      var self = this;
      this.buttonScore.click(function() { self.SetSortBy(0); });
      this.buttonTitle.click(function() { self.SetSortBy(1); });
      this.buttonDate.click(function() { self.SetSortBy(2); });

      this.filters_option_on_air.click(function() { self.SetOnAir(!self.filterOnAir); });
      this.filters_option_uncon.click(function() { self.SetUncon(!self.filterUncon); });
      this.filters_option_con.click(function() { self.SetCon(!self.filterCon); });
    }

    RefreshView()
    {
      switch (this.sortBy)
      {
        case 0:
          this.buttonScore.addClass("filters_checked");
          this.buttonTitle.removeClass("filters_checked");
          this.buttonDate.removeClass("filters_checked");
          break;

        case 1:
          this.buttonScore.removeClass("filters_checked");
          this.buttonTitle.addClass("filters_checked");
          this.buttonDate.removeClass("filters_checked");
          break;

        case 2:
          this.buttonScore.removeClass("filters_checked");
          this.buttonTitle.removeClass("filters_checked");
          this.buttonDate.addClass("filters_checked");
          break;
      }

      this.filterOnAir ? this.chbxOnAir.addClass("filters_checked") : this.chbxOnAir.removeClass("filters_checked");
      this.filterUncon ? this.chbxUnconfirmed.addClass("filters_checked") : this.chbxUnconfirmed.removeClass("filters_checked");
      this.filterCon ? this.chbxConfirmed.addClass("filters_checked") : this.chbxConfirmed.removeClass("filters_checked");
    }

    SetFilters(sortBy, onAir, unconfirmed, confirmed)
    {
      this.SetSortBy(sortBy, false);
      this.RefreshView();
    }

    SetSortBy(sortBy, refresh = true)
    {
      this.sortBy = sortBy;

      if (refresh)
        this.RefreshView();
    }

    SetOnAir(value)
    {
      this.filterOnAir = value;
      this.RefreshView();
    }

    SetUncon(value)
    {
      this.filterUncon = value;
      this.RefreshView();
    }

    SetCon(value)
    {
      this.filterCon = value;
      this.RefreshView();
    }
}