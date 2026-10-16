# Design System Master File

> **LOGIC:** When building a specific page, first check `design-system/pages/[page-name].md`.
> If that file exists, its rules **override** this Master file.
> If not, strictly follow the rules below.

---

**Project:** INTER-GROUPE
**Generated:** 2026-10-16 16:16:21
**Category:** B2B Service

---

## Global Rules

### Color Palette (Conforme DEC-007)

| Role | Hex | CSS Variable | Description / Usage |
|------|-----|--------------|---------------------|
| Primary | `#0A6E3F` | `--color-primary` | Vert institutionnel foncé (autorité, logo ITG, en-têtes clés) |
| On Primary | `#FFFFFF` | `--color-on-primary` | Blanc sur fond primaire |
| Accent / CTA | `#1DB560` | `--color-accent` | Vert d'action / bouton dynamique (conversion, focus) |
| On Accent | `#FFFFFF` | `--color-on-accent` | Blanc sur bouton accent |
| Secondary | `#1A3A6B` | `--color-secondary` | Bleu profond institutionnel (titres, confiance, navigation) |
| On Secondary | `#FFFFFF` | `--color-on-secondary` | Blanc sur fond secondaire |
| Background | `#F8FAFC` | `--color-background` | Fond général sobre et lumineux |
| Foreground | `#1E293B` | `--color-foreground` | Texte principal haute lisibilité (WCAG AAA) |
| Card | `#FFFFFF` | `--color-card` | Surface des cartes et panneaux |
| Card Foreground | `#1E293B` | `--color-card-foreground` | Texte sur carte |
| Muted | `#F1F5F9` | `--color-muted` | Surface neutre douce |
| Muted Foreground | `#64748B` | `--color-muted-foreground` | Texte secondaire / légendes |
| Border | `#E2E8F0` | `--color-border` | Bordures subtiles |
| Success | `#16A34A` | `--color-success` | Succès et confirmations |
| Warning | `#D97706` | `--color-warning` | Alertes et avertissements |
| Destructive / Danger | `#DC2626` | `--color-destructive` | Erreurs et actions destructives |
| Info | `#2563EB` | `--color-info` | Notifications informatives |
| Ring / Focus | `rgba(29, 181, 96, 0.4)` | `--color-ring` | Anneau de focus visible et accessible |

**Color Notes:** Palette institutionnelle B2B spécifique à INTER-GROUPE, respectant l'identité visuelle ivoirienne (vert ITG + bleu confiance).

### Typography (Conforme DEC-007)

- **Heading Font:** DM Sans (Google Fonts)
- **Body Font:** Inter (Google Fonts)
- **Mood:** Cabinet professionnel B2B, ingénierie informatique & formation, moderne, lisible, accessible
- **Google Fonts:** [DM Sans + Inter](https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=Inter:wght@400;500;600;700&display=swap)

**CSS Import:**
```css
@import url('https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,500;0,9..40,600;0,9..40,700;1,9..40,400&family=Inter:wght@400;500;600;700&display=swap');
```

### Spacing Variables

| Token | Value | Usage |
|-------|-------|-------|
| `--space-xs` | `4px` / `0.25rem` | Tight gaps |
| `--space-sm` | `8px` / `0.5rem` | Icon gaps, inline spacing |
| `--space-md` | `16px` / `1rem` | Standard padding |
| `--space-lg` | `24px` / `1.5rem` | Section padding |
| `--space-xl` | `32px` / `2rem` | Large gaps |
| `--space-2xl` | `48px` / `3rem` | Section margins |
| `--space-3xl` | `64px` / `4rem` | Hero padding |

### Shadow Depths

| Level | Value | Usage |
|-------|-------|-------|
| `--shadow-sm` | `0 1px 2px rgba(0,0,0,0.05)` | Subtle lift |
| `--shadow-md` | `0 4px 6px rgba(0,0,0,0.1)` | Cards, buttons |
| `--shadow-lg` | `0 10px 15px rgba(0,0,0,0.1)` | Modals, dropdowns |
| `--shadow-xl` | `0 20px 25px rgba(0,0,0,0.15)` | Hero images, featured cards |

---

## Component Specs

### Buttons

```css
/* Primary Button */
.btn-primary {
  background: #0369A1;
  color: #FFFFFF;
  padding: 12px 24px;
  border-radius: 8px;
  font-weight: 600;
  transition: all 200ms ease;
  cursor: pointer;
}

.btn-primary:hover {
  opacity: 0.9;
  transform: translateY(-1px);
}

/* Secondary Button */
.btn-secondary {
  background: transparent;
  color: #0F172A;
  border: 2px solid #0F172A;
  padding: 12px 24px;
  border-radius: 8px;
  font-weight: 600;
  transition: all 200ms ease;
  cursor: pointer;
}
```

### Cards

```css
.card {
  background: #F8FAFC;
  border-radius: 12px;
  padding: 24px;
  box-shadow: var(--shadow-md);
  transition: all 200ms ease;
  cursor: pointer;
}

.card:hover {
  box-shadow: var(--shadow-lg);
  transform: translateY(-2px);
}
```

### Inputs

```css
.input {
  padding: 12px 16px;
  border: 1px solid #E2E8F0;
  border-radius: 8px;
  font-size: 16px;
  transition: border-color 200ms ease;
}

.input:focus {
  border-color: #0F172A;
  outline: none;
  box-shadow: 0 0 0 3px #0F172A20;
}
```

### Modals

```css
.modal-overlay {
  background: rgba(0, 0, 0, 0.5);
  backdrop-filter: blur(4px);
}

.modal {
  background: white;
  border-radius: 16px;
  padding: 32px;
  box-shadow: var(--shadow-xl);
  max-width: 500px;
  width: 90%;
}
```

---

## Style Guidelines

**Style:** Accessible & Ethical

**Keywords:** Accessible, inclusive interface, high contrast, large text (16px+), keyboard navigation, screen reader friendly, accessibility standards aware, focus state, semantic

**Best For:** Government, healthcare, education, inclusive products, large audience, legal compliance, public

**Key Effects:** Clear focus rings (3-4px), ARIA labels, skip links, responsive design, reduced motion, 44x44px touch targets

### Page Pattern

**Pattern Name:** Trust & Authority + Conversion

- **Conversion Strategy:** Security badges. Case studies. Transparent pricing. Low-friction form. Provide pause/stop and stop the logo carousel on focus, hover, and reduced motion. Previous/next controls provide the keyboard equivalent; pause offscreen/hidden and render a static logo set under reduced motion.
- **CTA Placement:** Contact Sales / Get Quote (primary) + Nav
- **Section Order:** Hero (mission/credibility) > Proof (logos, certs, stats) > Solution overview > Clear CTA path

---

## Anti-Patterns (Do NOT Use)

- ❌ Playful design
- ❌ Hidden credentials
- ❌ AI purple/pink gradients

### Additional Forbidden Patterns

- ❌ **Emojis as icons** — Use SVG icons (Heroicons, Lucide, Simple Icons)
- ❌ **Missing cursor:pointer** — All clickable elements must have cursor:pointer
- ❌ **Layout-shifting hovers** — Avoid scale transforms that shift layout
- ❌ **Low contrast text** — Maintain 4.5:1 minimum contrast ratio
- ❌ **Instant state changes** — Always use transitions (150-300ms)
- ❌ **Invisible focus states** — Focus states must be visible for a11y

---

## Pre-Delivery Checklist

Before delivering any UI code, verify:

- [ ] No emojis used as icons (use SVG instead)
- [ ] All icons from consistent icon set (Heroicons/Lucide)
- [ ] `cursor-pointer` on all clickable elements
- [ ] Hover states with smooth transitions (150-300ms)
- [ ] Light mode: text contrast 4.5:1 minimum
- [ ] Focus states visible for keyboard navigation
- [ ] `prefers-reduced-motion` respected
- [ ] Responsive: 375px, 768px, 1024px, 1440px
- [ ] No content hidden behind fixed navbars
- [ ] No horizontal scroll on mobile
