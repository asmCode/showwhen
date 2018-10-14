class FiltersPanel
{
    constructor(panelRoot)
    {
      this.sortBy = 0;
      this.filterOnAir = true;
      this.filterUncon = true;
      this.filterCon = true;
      this.initialFilterCode = this.EncodeFilters();

      this.resetCallback = null;
      this.applyCallback = null;

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
      this.filterButton = $(".filter_button");

      var self = this;
      this.buttonScore.click(function() { self.SetSortBy(0); });
      this.buttonTitle.click(function() { self.SetSortBy(1); });
      this.buttonDate.click(function() { self.SetSortBy(2); });

      this.filters_option_on_air.click(function() { self.SetOnAir(!self.filterOnAir); });
      this.filters_option_uncon.click(function() { self.SetUncon(!self.filterUncon); });
      this.filters_option_con.click(function() { self.SetCon(!self.filterCon); });
      this.filterButton.click(function() { self.OnFilterButton(); });

      $(panelRoot).find("#filters_button_reset").click(function() { self.OnResetClicked(); });
      $(panelRoot).find("#filters_button_apply").click(function() { self.OnApplyClicked(); });

      this.panelRoot.css("display", "flex");
      this.Hide();

      this.RefreshView();
    }

    IsVisible()
    {
      return this.panelRoot.is(":visible");
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

    SetApplyCallback(applyCallback)
    {
      this.applyCallback = applyCallback;
    }

    OnResetClicked()
    {
      this.Reset();
    }

    OnApplyClicked()
    {
      Analytics.TrackFilterApply(this.sortBy, this.filterOnAir, this.filterUncon, this.filterCon);

      this.Hide();

      if (this.applyCallback != null)
        this.applyCallback(this.EncodeFilters());
    }

    Reset()
    {
      this.sortBy = 0;
      this.filterOnAir = true;
      this.filterUncon = true;
      this.filterCon = true;
      this.RefreshView();
    }

    SetFiltersFromCode(code)
    {
      this.initialFilterCode = code;

      var mask_on_air = 1 << 7;
      var mask_unconfirmed = 1 << 6;
      var mask_confirmed = 1 << 5;
      var mask_sort_by = 0x0F;
    
      this.filterOnAir = (code & mask_on_air) != mask_on_air;
      this.filterUncon = (code  & mask_unconfirmed) != mask_unconfirmed;
      this.filterCon = (code & mask_confirmed) != mask_confirmed;
      this.sortBy = code & mask_sort_by;

      this.RefreshView();
    }

    EncodeFilters()
    {
      var filter = this.sortBy;

      if (!this.filterOnAir)
        filter |= (1 << 7);
      if (!this.filterUncon)
        filter |= (1 << 6);
      if (!this.filterCon)
        filter |= (1 << 5);

      return filter;
    }

    OnFilterButton()
    {
      // If we are closing the panel using filter button, then we need to revert any changes made on the filters.
      if (this.IsVisible())
        this.SetFiltersFromCode(this.initialFilterCode);

      this.TogglePanel();
    }

    TogglePanel()
    {
      if (this.IsVisible()) {
        this.Hide();
      }
      else
        this.Show();
    }

    Show()
    {
      Analytics.TrackFilterOpen();

      this.initialFilterCode = this.EncodeFilters();
      this.panelRoot.show();
    }
    
    Hide()
    {
      this.panelRoot.hide();
    }
}
